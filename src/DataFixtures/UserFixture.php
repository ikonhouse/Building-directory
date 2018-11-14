<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\entity\User;

class UserFixture extends Fixture
{
    private $passwordEncoder;

     public function __construct(UserPasswordEncoderInterface $passwordEncoder)
     {
         $this->passwordEncoder = $passwordEncoder;
     }

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $userEntity = new User();
        $userEntity->setUsername('admin');
        $userEntity->setPassword('$2y$13$wZ3FKAebsSOo4vr2otdVTuzj5RgKvd3FsvjkrId36udTDHIs7FRCK');
        $userEntity->setRoles(['ROLE_ADMIN']);
        $manager->persist($userEntity);
        $manager->flush();




        $manager->flush();
    }
}
