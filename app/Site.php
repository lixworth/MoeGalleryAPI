<?php declare(strict_types=1);

namespace App;

/**
 * Site.php
 *
 * @property string favicon
 * @property string url
 * @property string title
 * @date 2019/8/31 18:27
 * @author lixworth
 */
class Site extends \Illuminate\Database\Eloquent\Model
{
    public $table = 'site';
}
