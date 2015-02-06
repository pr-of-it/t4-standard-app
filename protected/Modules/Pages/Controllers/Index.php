<?php

namespace App\Modules\Pages\Controllers;
use App\Modules\Pages\Models\Page;
use T4\Core\Std;
use T4\Http\E404Exception;
use T4\Mvc\Controller;

class Index
    extends Controller
{
    public $ip;
    public function actionPageByUrl($url)
    {
        $page = Page::findByUrl($url);
        $this->data->page = $page;
        if (empty($this->data->page)) {
            throw new E404Exception;
        }

        if ($url == "index") {

            $this->data->ip = long2ip($this->app->request->ip);
            $address = $this->app->extensions->sxgeo->getLocation($this->app->request->ip);

            if ($address) {

                $this->data->address = 'Ваша адрес: ' . $address['country']['name_ru'] . ', регион ' . $address['region']['name_ru'] . ', город ' .
                    $address['city']['name_ru'];

            } else {

                return $this->data->address = "Ваш адрес не определен";
            }
        }


    }

} 