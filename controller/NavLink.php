<?php
class navLink
{
    public $name;
    public $icon;
    public $link;

    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setIcon($icon)
    {
        $this->icon = $icon;
    }
    public function getIcon()
    {
        return $this->icon;
    }
    public function setLink($link)
    {
        $this->link = $link;
    }
    public function getLink()
    {
        return $this->link;
    }


    public function __construct($name, $icon, $link)
    {
        $this->setIcon($icon);
        $this->setName($name);
        $this->setLink($link);
    }

    public function createNavItem()
    {
        return "<li class='nav-item'>
        <a href='$this->link' class='nav-link'>
            <i class='fas fa-$this->icon text-warning'></i>
            <p>$this->name</p>
        </a>
    </li>";
    }
    public function clone()
    {
        return new navLink($this->name, $this->icon, $this->link);
    }
};
