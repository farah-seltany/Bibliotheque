<?php

namespace App\DataFixtures;

use App\Entity\Author;
use App\Entity\Book;
use App\Entity\Category;
use App\Entity\Editor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $faker = Factory::create('fr_FR');

            for ($a = 0; $a < 5; $a++) {
                $author = new Author();
                $author->setFirstname($faker->firstName)
                    ->setLastname($faker->lastName)
                    ->setBirthday($faker->dateTime($max = 'now', $timezone = null));
    
                $manager->persist($author);

                for ($b = $a; $b < $a + 5; $b++) {
                    $book = new Book();
                    $book->setAuthor($author)
                        ->setTitle($faker->word)
                        ->setSlug("Slug-$b")
                        ->setIsbn($faker->isbn10)
                        ->setResume("Resume $b")
                        ->setPrice($faker->randomFloat($nbDecimals = 2, $min = 10, $max = 1000));

                    $manager->persist($book);
                }
            }

        $manager->flush();
    }
}