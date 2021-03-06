<?php

namespace Styde;

require('../vendor/autoload.php');

Traslator::set([
    'BasicBowAttack' => '<b>:unit</b> dispara una flecha con <b>Arco</b> a <b>:opponent</b>',
    'BasicSwordAttack' => '<b>:unit</b> ataca con la <b>Espada</b> a <b>:opponent</b>',
    'CrossBowAttack' => '<b>:unit</b> dispara una flecha con <b>Ballesta</b> a <b>:opponent</b>',
    'FireBowAttack' => '<b>:unit</b> dispara una flecha de fuego con un <b>Arco de Fuego</b> a <b>:opponent</b>'
]);

//Metodo factory o tambien llamado un name construct
$ramm = Unit::createSoldier()
        ->setWeapon(new Weapons\CrossBow())
        ->setArmor(new Armors\SilverArmor())
        ->setShield();

// $ramm = new Unit('Ramm', new Weapons\BasicSword);
// $ramm->setArmor(new Armors\BronzeArmor());

$silence = new Unit('Silence', new Weapons\FireBow);

$silence->attack($ramm);

$silence->attack($ramm);

$ramm->attack($silence);