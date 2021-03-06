<?php
/**
 * @title            Folder Permission Class
 *
 * @author           Pierre-Henry Soria <ph7software@gmail.com>
 * @copyright        (c) 2013, Pierre-Henry Soria. All Rights Reserved.
 * @license          GNU General Public License; See PH7.LICENSE.txt and PH7.COPYRIGHT.txt in the root directory.
 * @package          PH7 / Framework / File / Permission
 */

namespace PH7\Framework\File\Permission;
defined('PH7') or exit('Restricted access');

class Folder
{

    public function canReadWrite($sFolder)
    {
        clearstatcache();
        return (is_folder($sFolder) && is_readable($sFolder) && is_writable($sFolder));
    }

}
