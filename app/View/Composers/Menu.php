<?php

namespace App\View\Composers;

use Illuminate\View\View;

class Menu
{
    /**
     * The auth user.
     *
     * @var \App\Models\User
     */
    private $user;

    /**
     * Create a new user composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->user = auth()->user();
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        if ($this->user && $this->user->role) {
            $menu = $this->getMenu($this->user->role_id);

            $view->with('menu', $menu);
        }
    }

    private function getMenu(int $adminRoleId): array
    {
        switch ($adminRoleId) {
            case 1:
                return $this->getAdminMenu();
        }

        return [];
    }

    private function getAdminMenu(): array
    {
        return [
            'Товары' => [
                [
                    'name' => 'Товары',
                    'logo' => 'bx-basket',
                    'route' => route('products.index'),
                ],
            ],
            'Пользователи' => [
                [
                    'name' => 'Пользователи',
                    'logo' => 'bx-user',
                    'route' => route('users.index'),
                ],
                [
                    'name' => 'Отзывы',
                    'logo' => 'bx-message-alt-detail',
                    'route' => route('reviews.index'),
                ],
                [
                    'name' => 'Обратная связь',
                    'logo' => 'bx-message-rounded-dots',
                    'route' => route('feedbacks.index'),
                ],
            ],
            'Оплата' => [
                [
                    'name' => 'Заказы',
                    'logo' => 'bx-wallet',
                    'route' => route('orders.index'),
                ],
            ],
            'Настройки' => [
                [
                    'name' => 'Объявления',
                    'logo' => 'bx-cog',
                    'route' => route('announcements.index'),
                ],
                [
                    'name' => 'Категории',
                    'logo' => 'bx-category',
                    'route' => route('categories.index'),
                ],
                [
                    'name' => 'Города',
                    'logo' => 'bx-city',
                    'route' => route('cities.index'),
                ],
            ],
            'Prosklad' => [
                [
                    'name' => 'Импорт',
                    'logo' => 'bx-data',
                    'route' => route('import.database'),
                ],
                [
                    'name' => 'Экспорт',
                    'logo' => 'bx-data',
                    'route' => route('export.database'),
                ],
            ],
        ];
    }
}
