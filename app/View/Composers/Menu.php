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
                route('products') => 'Товары',
            ],
            'Пользователи' => [
                route('users') => 'Пользователи',
                route('reviews') => 'Отзывы',
                route('feedbacks') => 'Обратная связь',
            ],
            'Оплата' => [
                route('orders') => 'Заказы',
            ],
            'Настройки' => [
                route('announcements') => 'Объявления',
                route('categories') => 'Категории',
                route('cities') => 'Города',
            ],
            'Prosklad' => [
                route('importProsklad') => 'Импорт',
                route('exportProsklad') => 'Экспорт',
            ],
        ];
    }
}
