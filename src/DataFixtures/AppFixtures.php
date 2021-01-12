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

        for ($c = 0; $c < 3; $c++) {
            $category = new Category();
            $category->setName($faker->unique()->randomElement($array = array ('Aventure','Policier','Jeunesse')))
                   ->setSlug($faker->slug);

            $editor = new Editor();
            $editor->setName($faker->unique()->randomElement($array = array ('Maison du livre','La belle page','HC Edition')))
                   ->setFoundationYear($faker->year);

            $manager->persist($editor);

            $manager->persist($category);

            for ($a = 0; $a < mt_rand(1, 10); $a++) {
                $author = new Author();
                $author->setFirstname($faker->firstName)
                    ->setLastname($faker->lastName)
                    ->setBirthday($faker->date($format = 'Y-m-d', $max = 'now'));
    
                $manager->persist($author);
    
                for ($b = 0; $b < mt_rand(1, 10); $b++) {
                    $book = new Book();
                    $book->setEditor($editor)
                        ->setAuthor($author)
                        ->setTitle($faker->sentence($nbWords = 3, $variableNbWords = true))
                        ->setSlug($faker->slug)
                        ->setIsbn($faker->isbn10)
                        ->setResume($faker->sentence($nbWords = 50, $variableNbWords = true))
                        ->setPrice($faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100));

                    $manager->persist($book);
                }
            }


            $manager->flush();
        }
    }
}