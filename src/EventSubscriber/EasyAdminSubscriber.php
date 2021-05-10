<?php
# src/EventSubscriber/EasyAdminSubscriber.php
namespace App\EventSubscriber;

use App\Entity\InvoiceReceipt;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityUpdatedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use http\Client\Request;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class EasyAdminSubscriber implements EventSubscriberInterface
{
    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * List of supported locales.
     *
     * @var string[]
     */
    private $locales = [];

    /**
     * @var string
     */
    private $defaultLocale = '';

    /**
     * @var string
     */
    private $event;

    /**
     * @param string      $locales       Supported locales separated by '|'
     * @param string|null $defaultLocale
     */
    public function __construct(UrlGeneratorInterface $urlGenerator, $locales, $defaultLocale = null)
    {
        $this->urlGenerator = $urlGenerator;

        $this->locales = explode('|', trim($locales));

        if (empty($this->locales)) {
            throw new \UnexpectedValueException('The list of supported locales must not be empty.');
        }
        $this->defaultLocale = $defaultLocale ?: $this->locales[0];

        if (!in_array($this->defaultLocale, $this->locales)) {
            throw new \UnexpectedValueException(sprintf('The default locale ("%s") must be one of "%s".', $this->defaultLocale, $locales));
        }

        // Add the default locale at the first position of the array,
        // because Symfony\HttpFoundation\Request::getPreferredLanguage
        // returns the first element when no an appropriate language is found
        array_unshift($this->locales, $this->defaultLocale);
        $this->locales = array_unique($this->locales);
    }

    public static function getSubscribedEvents()
    {
        return [
            kernelEvents::REQUEST => ['onKernelRequest'],
            AfterEntityPersistedEvent::class => ['redirect'],
        ];
    }
    public function redirect(AfterEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if (!($entity instanceof InvoiceReceipt)) {
            return;
        } else {
            $url = $this->urlGenerator->generate('admin', [
                'entity' => 'InvoiceReceipt',
                'crudAction' => 'detail',
                'menuIndex' => 1,
                'id' => 2,
                'crudControllerFqcn' => 'App\Controller\Admin\InvoiceReceiptCrudController',
            ]);

            $response = new RedirectResponse($url);
            $this->event->setResponse($response);
        }
    }
    public function onKernelRequest(RequestEvent &$event)
    {
        $this->event = $event;
    }
}
