<?php

namespace Styde;

class Unit
{
    protected $hp = 40;
    protected $name;
    protected $armor;
    protected $weapon;

    public function __construct($name, Weapon $weapon = null)
    {
        $this->name = $name;
        $this->weapon = $weapon;
        $this->armor = new Armors\MissingArmor();
    }

    public function setWeapon(Weapon $weapon)
    {
        $this->weapon = $weapon;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getHp()
    {
        return $this->hp;
    }

    public function setArmor(Armor $armor = null)
    {
        $this->armor = $armor;
    }

    public function attack(Unit $opponent)
    {
        $attack = $this->weapon->createAttack();

        show($attack->getDescription($this, $opponent));

        $opponent->takeDamage($attack);
    }

    public function takeDamage(Attack $attack)
    {
        $this->hp -= $this->armor->absorbDamage($attack);
        if ($this->hp < 0) {
            $this->hp = 0;
        }

        show("{$this->name} ahora tiene {$this->hp} puntos de vida");
        
        if ($this->hp <= 0) {
            $this->die();
        }
    }
    
    public function move($direction)
    {
        show("{$this->name} camina hacia {$direction}");
    }

    public function die()
    {
        show("{$this->name} Muere");
        exit();
    }
} 