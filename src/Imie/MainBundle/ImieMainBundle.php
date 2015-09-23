<?php

namespace Imie\MainBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ImieMainBundle extends Bundle
{
  public function getParent()
    {
        return 'FOSUserBundle';
    }
}
