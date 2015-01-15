<?php

namespace Gajdaw\BDDTutorial\GeographyBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Gajdaw\BDDTutorial\GeographyBundle\Entity\Channel;
use Symfony\Component\Yaml\Yaml;

class LoadBeaches implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {

        $filename = __DIR__ . '/../../data/beaches.yml';
        $yml = Yaml::parse(file_get_contents($filename));
        foreach ($yml as $item) {
            $beach = new Channel();
            $beach->setBeach($item['name']);
            $beach->setSize($item['size']);
            $manager->persist($channel);
        }

        $manager->flush();
    }
}
