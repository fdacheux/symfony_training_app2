<?php

namespace App\DataFixtures;

use App\Entity\Animal;
use App\Entity\Family;
use App\Entity\Person;
use App\Entity\Dispose;
use App\Entity\Continent;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AnimalFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $p1 = new Person();
        $p1->setName("Matthew");
        $manager->persist($p1);
        $p2 = new Person();
        $p2->setName("Cara");
        $manager->persist($p2);
        $p3 = new Person();
        $p3->setName("Bob");
        $manager->persist($p3);

        $continent1 = new Continent();
        $continent1->setFieldName("Europe");
        $manager->persist($continent1);

        $continent2 = new Continent();
        $continent2->setFieldName("Asie");
        $manager->persist($continent2);

        $continent3 = new Continent();
        $continent3->setFieldName("Afrique");
        $manager->persist($continent3);

        $continent4 = new Continent();
        $continent4->setFieldName("Océanie");
        $manager->persist($continent4);

        $continent5 = new Continent();
        $continent5->setFieldName("Amérique");
        $manager->persist($continent5);

        $c1 = new Family();
        $c1->setFieldName("mammals")->setDescription("Vertabrates, feeding their babies with milk");
        $manager->persist($c1);

        $c2 = new Family();
        $c2->setFieldName("reptiles")->setDescription("Vertabrates that crawl");
        $manager->persist($c2);

        $c3 = new Family();
        $c3->setFieldName("fishes")->setDescription("Unvertabrates underwater");
        $manager->persist($c3);

        $a1 = new Animal();
        $a1->setName('Dog')
        ->setDescription('Man\'s best friend')
        ->setImage('dog.png')
        ->setWeight(20)
        ->setDangerous(false)
        ->setFamily($c1)
        ->addContinent($continent1)
        ->addContinent($continent2)
        ->addContinent($continent3)
        ->addContinent($continent4)
        ->addContinent($continent5);

        $manager->persist($a1);

        $a2 = new Animal();
        $a2->setName('Pig')
        ->setDescription('A pink animal')
        ->setImage('pig.png')
        ->setWeight(300)
        ->setDangerous(false)
        ->setFamily($c1)
        ->addContinent($continent1)
        ->addContinent($continent5);
        $manager->persist($a2)
        ;

        $a3 = new Animal();
        $a3->setName('Snake')
        ->setDescription('A sneaky animal')
        ->setImage('snake.png')
        ->setWeight(5)
        ->setDangerous(true)
        ->setFamily($c2)
        ->addContinent($continent2)
        ->addContinent($continent3)
        ->addContinent($continent4);
        $manager->persist($a3);

        $a4 = new Animal();
        $a4->setName('Crocodile')
        ->setDescription('An animal with a very sharp smile !')
        ->setImage('croco.png')
        ->setWeight(500)
        ->setDangerous(true)
        ->setFamily($c2)
        ->addContinent($continent3)
        ->addContinent($continent4)
        ->addContinent($continent5);
        $manager->persist($a4);

        $a5 = new Animal();
        $a5->setName('Shark')
        ->setDescription('Jaw movie\'s main character')
        ->setImage('shark.png')
        ->setWeight(800)
        ->setDangerous(true)
        ->setFamily($c3)
        ->addContinent($continent4)
        ->addContinent($continent5);
        $manager->persist($a5);

        $d1 = new Dispose();
        $d1->setPerson($p1)->setAnimal($a1)->setNb(3);
        $manager->persist($d1);

        $d2 = new Dispose();
        $d2->setPerson($p1)->setAnimal($a2)->setNb(10);
        $manager->persist($d2);

        $d3 = new Dispose();
        $d3->setPerson($p1)->setAnimal($a3)->setNb(2);
        $manager->persist($d3);

        $d4 = new Dispose();
        $d4->setPerson($p2)->setAnimal($a3)->setNb(5);
        $manager->persist($d4);

        $d5 = new Dispose();
        $d5->setPerson($p2)->setAnimal($a4)->setNb(10);
        $manager->persist($d5);

        $d6 = new Dispose();
        $d6->setPerson($p3)->setAnimal($a5)->setNb(20);
        $manager->persist($d6);

        $manager->flush();
    }
}
