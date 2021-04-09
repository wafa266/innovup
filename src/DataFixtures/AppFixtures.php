<?php

namespace App\DataFixtures;

use App\Entity\Category;
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
        for($i = 0; $i < 10; $i++) {
            $categ = (new Category())->setName('Aliments ' . $i);
            $manager->persist($categ);

        }
        for($i = 0; $i < 10; $i++) {
            $provider = (new Provider())->setEmail('wafa'. $i .'@gmail.com')->setAddress('Tunis 567876')
                ->setFirstName('Carrefour_' . $i)->setLastName('Market_' . $i)->setPhone('09875653987' . $i);
            $manager->persist($provider);

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
