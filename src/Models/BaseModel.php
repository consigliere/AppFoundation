<?php
/**
 * BaseModel.php
 * Created by @rn on 12/28/2016 10:30 AM.
 */

namespace App\Components\AppFoundation\Models;

use Illuminate\Database\Eloquent\Model;
use App\Components\AppFoundation\Traits\QueryBasic;
use App\Components\AppFoundation\Traits\Pagination;
use App\Components\LogDB\Traits\LogDB;

class BaseModel extends Model
{
    use QueryBasic;
    use Pagination;
    use LogDB;

    protected $fillable = [];
}
