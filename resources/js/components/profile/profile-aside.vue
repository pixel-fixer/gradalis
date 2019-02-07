<template>
<div>
    <aside class="pt-1">
        <div class="buttons has-addons has-addons-fullwidth field">
            <a href="#" class="control button is-warning h-3 is-size-875 has-text-weight-bold">Продать бизнес</a>
            <a href="#" class="control button is-info h-3 is-size-875 has-text-weight-bold">Продать франшизу</a>
        </div>
        <nav class="aside-nav">
            <ul>
                <li class="aside-nav__item">
                    <router-link to="/products" tag="a">
                        <img src="/svg/icons/ic_product.svg" class="svg">
                        <span class="aside-nav__item__title has-text-weight-bold">Продукты</span>
                        <span class="aside-nav__item__count">24</span>
                    </router-link>
                </li>
                <li class="aside-nav__item">
                     <router-link to="/purchased-products" tag="a">
                        <img src="/svg/icons/ic_cart_c.svg" class="svg">
                        <span class="aside-nav__item__title has-text-weight-bold">Купленные продукты</span>
                        <span class="aside-nav__item__count">129</span>
                     </router-link>
                </li>
                <li class="aside-nav__item">
                    <a href="#">
                        <img src="/svg/icons/ic_objects.svg" class="svg" alt="Objects">
                        <span class="aside-nav__item__title has-text-weight-bold">Выши объекты</span>
                        <span class="aside-nav__item__count">5</span>
                    </a>
                </li>
                <li class="aside-nav__item">
                    <a href="#">
                        <img src="/svg/icons/ic_eye.svg" class="svg" alt="Eye">
                        <span class="aside-nav__item__title has-text-weight-bold">Запросы на просмотр</span>
                        <span class="aside-nav__item__count">5</span>
                    </a>
                </li>
                <li class="aside-nav__item">
                     <router-link to="/chat" tag="a">
                        <img src="/svg/icons/ic_messages.svg" class="svg" alt="Messages">
                        <span class="aside-nav__item__title has-text-weight-bold">Сообщения</span>
                        <span class="aside-nav__item__count tag is-danger is-rounded tag__count is-flex">12</span>
                     </router-link>
                </li>
                <li class="aside-nav__item">
                    <router-link to="/settings" tag="a">
                        <img src="/svg/icons/ic_profile_settings.svg" class="svg" alt="Settings">
                        <span class="aside-nav__item__title has-text-weight-bold">Настройки профиля</span>
                    </router-link>
                </li>
                <li class="aside-nav__item">
                    <router-link to="/favorites" tag="a">
                        <img src="/svg/icons/ic_favorites.svg" class="svg" height="16" width="16">
                        <span class="aside-nav__item__title has-text-weight-bold">Избранное</span>
                    </router-link>
                </li>
                <li class="aside-nav__item">
                     <router-link to="/legal" tag="a">
                        <img src="/svg/icons/ic_contract.svg" class="svg" alt="Contract">
                        <span class="aside-nav__item__title has-text-weight-bold">Условия и договора</span>
                        <span class="aside-nav__item__count">69</span>
                     </router-link>
                </li>
            </ul>
        </nav>
    </aside>
    </div>
</template>

<script>
export default {
    name: 'profile-aside'
}
</script>