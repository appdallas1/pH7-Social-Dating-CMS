<?php
/**
 * @author         Pierre-Henry Soria <ph7software@gmail.com>
 * @copyright      (c) 2012-2013, Pierre-Henry Soria. All Rights Reserved.
 * @license        GNU General Public License; See PH7.LICENSE.txt and PH7.COPYRIGHT.txt in the root directory.
 * @package        PH7 / App / System / Module / Payment / Config
 */
namespace PH7;
defined('PH7') or exit('Restricted access');
use PH7\Framework\Url\HeaderUrl, PH7\Framework\Mvc\Router\Uri;

class Permission extends PermissionCore
{

    public function __construct()
    {
        parent::__construct();

        if(!AdminCore::auth() && $this->registry->controller === 'AdminController')
        {
            // For security reasons, we do not redirectionnons the user to hide the url of the administrative part.
            HeaderUrl::redirect(Uri::get('payment','main','index'), $this->adminSignInMsg(), 'error');
        }
        elseif(!UserCore::auth() && $this->registry->controller !== 'AdminController')
        {
            HeaderUrl::redirect(Uri::get('user','main','login'), $this->signInMsg(), 'error');
        }

    }

}
