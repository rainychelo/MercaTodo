<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Http\Requests\StoreSalesRequest;
use App\Http\Requests\UpdateSalesRequest;
use App\Models\ShoppingCart;
use App\Providers\RouteServiceProvider;
use Dnetix\Redirection\PlacetoPay;
use Illuminate\View\View;

class SalesController extends Controller
{
    public function index(): View
    {
        return view('welcome');
    }
    public function create()
    {
        //
    }
    public function store()
    {
        // crear un provider para el inicio de sesion en place to pay
        $login= config('app.login');
        $trankey= config('app.trankey');
        $baseurl= config('app.baseurl');

        //ejemplo integracion con place to pay
        $placetopay = new PlacetoPay([
            'login' => $login,
            'tranKey' => $trankey,
            'baseUrl' => $baseurl,
            'timeout' => 10,
        ]);

        //test de pago
        $reference = 'COULD_BE_THE_PAYMENT_ORDER_ID';
        $request = [
            'payment' => [
                'reference' => $reference,
                'description' => 'Testing payment',//el id del cliente, y los productos a comprar
                'amount' => [
                    'currency' => 'USD',
                    'total' => 120,//valor total de la compra
                ],
            ],
            'expiration' => date('c', strtotime('+2 days')),
            'returnUrl' => 'http://example.com/response?reference=' . $reference,//agregar ruta para ver el estado de la transaccion
            'ipAddress' => '127.0.0.1',
            'userAgent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36',
        ];


        $response = $placetopay->request($request);
        if ($response->isSuccessful()) {
            //agregar el estado a la base de datos
            $response->processUrl();
        } else {
            //agregar el estado a la base de datos, informar del error al cliente
            $response->status()->message();
        }
    }

    public function show(Sales $sales)
    {
        //
    }

    public function update(UpdateSalesRequest $request, Sales $sales)
    {

        $placetopay = new Dnetix\Redirection\PlacetoPay([
            'login' => 'YOUR_LOGIN', // Provided by PlacetoPay
            'tranKey' => 'YOUR_TRANSACTIONAL_KEY', // Provided by PlacetoPay
            'baseUrl' => 'https://THE_BASE_URL_TO_POINT_AT',
            'timeout' => 10, // (optional) 15 by default
        ]);

        //THE_REQUEST_ID_TO_QUERY el id de la compra a buscar
        $response = $placetopay->query('THE_REQUEST_ID_TO_QUERY');

        if ($response->isSuccessful()) {
            // In order to use the functions please refer to the Dnetix\Redirection\Message\RedirectInformation class

            if ($response->status()->isApproved()) {
                // The payment has been approved
            }
        } else {
            // There was some error with the connection so check the message
            print_r($response->status()->message() . "\n");
        }
    }
}
