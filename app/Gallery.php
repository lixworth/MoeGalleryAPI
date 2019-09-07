<?php declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model as ModelAlias;

/**
 * Gallery.php
 *
 * @property string title
 * @property string description
 * @property json tags
 * @property json images
 * @date 2019/9/7 19:33
 * @author lixworth
 */
class Gallery extends ModelAlias
{
    public $table = 'gallery';

}
