<?php

namespace dokuwiki\Menu\Item;

/**
 * Class Media
 *
 * Opens the media manager
 */
class Media extends AbstractItem
{
    /** @inheritdoc */
    public function __construct()
    {
        global $ID;
        parent::__construct();

        if (auth_quickaclcheck(getNS($ID).':*') < AUTH_EXPOSE && auth_quickaclcheck($ID) < AUTH_EDIT) throw new \RuntimeException("no permission to see the media manager");

        $this->svg = DOKU_INC . 'lib/images/menu/folder-multiple-image.svg';
        $this->params['ns'] = getNS($ID);
    }
}
