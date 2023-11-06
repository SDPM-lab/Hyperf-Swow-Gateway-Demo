<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace App\Controller;
use Hyperf\Context\ApplicationContext;
use App\JsonRpc\ProductInterface;
use App\JsonRpc\Product;

use Hyperf\Di\Annotation\Inject;
class IndexController extends AbstractController
{
    #[Inject]
    protected ProductInterface $ProductService;

    public function index()
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        return [
            'method' => $method,
            'message' => "Hello {$user}.",
        ];
    }

    public function products(Product $service)
    {
        // return ['code' => 200, 'data' => $this->ProductService->products()];
        $products =  $service->products();

        return [
            'products'=>$products,
        ];
    }
}
