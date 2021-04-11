<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Customer;
use App\Entity\Product;
use App\Entity\Provider;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    public function __construct(UserPasswordEncoderInterface $encoder){

    }

    public function load(ObjectManager $manager)
    {
        // Fixtures Category
        for($i = 0; $i < 10; $i++) {
            $categ = (new Category())->setName('Aliments ' . $i);
            $manager->persist($categ);

        }
        // Fixtures Provider
        for($i = 0; $i < 30; $i++) {
            $provider = (new Provider())->setEmail('wafa'. $i .'@gmail.com')->setAddress('Tunis 567876')
                ->setFirstName('Carrefour_' . $i)->setLastName('Market_' . $i)->setPhone('09875653987' . $i);
            $manager->persist($provider);

        }
        // Fixtures Customer
        for($i = 0; $i < 20; $i++) {
            $customer = (new Customer())
                ->setEmail('452154875'. $i .'@gmail.com')
                ->setAddress('Tunis 567876')
                ->setFirstName('Customer_' . $i)
                ->setLastName('Market_' . $i)
                ->setPhone('09875653987' . $i)
                ->setTaxNumber('09875653987' . $i);
            $manager->persist($customer);

        }

        $cat = (new Category())->setName('Aliments');
        for($i = 0; $i < 30; $i++) {
            $product = (new Product())
                ->setName('Product num ' . $i)
                ->setPrice(20)
                ->setTva(1.3)
                ->setPrice_ttc(10)
                ->setPriceExcludingTax(30)
                ->setBarcode('14578998736356336')
                ->setImage('Image.jpg')
                ->setCategory($cat);
            $manager->persist($product);

        }

        $manager->flush();
    }
}
