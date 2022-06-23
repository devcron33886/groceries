<?php

namespace App\Http\Middleware;

use App\Basket\Contracts\BasketInterface;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RedirectIfCartIsEmpty
{

    public function __construct(protected BasketInterface $basket)
    {
    }

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($this->basket->isEmpty())
        {
            return redirect()->route('welcome');
        }
        return $next($request);
    }
}
