<template>
<div>
    <aside class="pt-1">
        <div class="buttons has-addons has-addons-fullwidth field" v-if="$userCan('object-sell')">
            <a href="/business/create" class="control button is-warning h-3 is-size-875 has-text-weight-bold">Продать бизнес</a>
            <a href="#" class="control button is-info h-3 is-size-875 has-text-weight-bold">Продать франшизу</a>
        </div>
        <nav class="aside-nav">
            <ul>
                <li class="aside-nav__item">
                    <router-link to="/profile/products" tag="a">
                        <img src="/svg/icons/ic_product.svg" class="svg">
                        <span class="aside-nav__item__title has-text-weight-bold">Продукты</span>
                        <!-- <span class="aside-nav__item__count">24</span> -->
                    </router-link>
                </li>
                <li class="aside-nav__item">
                    <router-link to="/profile/purchased-services" tag="a">
                        <img src="/svg/icons/ic_cart_c.svg" class="svg">
                        <span class="aside-nav__item__title has-text-weight-bold">Купленные продукты</span>
                        <!-- <span class="aside-nav__item__count">129</span> -->
                    </router-link>
                </li>
                <li class="aside-nav__item" v-if="$userCan('object-sell')">
                    <router-link to="/profile/objects" tag="a">
                        <img src="/svg/icons/ic_objects.svg" class="svg" alt="Objects">
                        <span class="aside-nav__item__title has-text-weight-bold">Ваши объекты</span>
                        <!-- <span class="aside-nav__item__count">5</span> -->
                    </router-link>
                </li>
                <li class="aside-nav__item" v-if="$userCan('object-sell')">
                    <router-link to="/profile/view-requests" tag="a">
                        <img src="/svg/icons/ic_eye.svg" class="svg" alt="Eye">
                        <span class="aside-nav__item__title has-text-weight-bold">Запросы на просмотр</span>
                        <!-- <span class="aside-nav__item__count">5</span> -->
                    </router-link>
                </li>
                <li class="aside-nav__item">
                     <router-link to="/profile/chat" tag="a">
                        <img src="/svg/icons/ic_messages.svg" class="svg" alt="Messages">
                        <span class="aside-nav__item__title has-text-weight-bold">Сообщения</span>
                        <!-- <span class="aside-nav__item__count tag is-danger is-rounded tag__count is-flex">12</span> -->
                     </router-link>
                </li>
                <li class="aside-nav__item" v-if="$userCan('object-buy')">
                     <router-link to="/profile/trips" tag="a">
                        <img src="/svg/icons/ic_aircraft.svg" class="svg">
                        <span class="aside-nav__item__title has-text-weight-bold">Ваши поездки</span>
                     </router-link>
                </li>
                <li class="aside-nav__item">
                    <router-link to="/profile/settings" tag="a">
                        <img src="/svg/icons/ic_profile_settings.svg" class="svg" alt="Settings">
                        <span class="aside-nav__item__title has-text-weight-bold">Настройки профиля</span>
                    </router-link>
                </li>
                <li class="aside-nav__item">
                    <router-link to="/profile/favorites" tag="a">
                        <img src="/svg/icons/ic_favorites-2.svg" class="svg" height="16" width="16">
                        <span class="aside-nav__item__title has-text-weight-bold">Избранное</span>
                    </router-link>
                </li>
                <li class="aside-nav__item">
                    <router-link to="/profile/balance" tag="a">
                        <span class="aside-nav__item__title has-text-weight-bold">Баланс</span>
                    </router-link>
                </li>
                <li class="aside-nav__item">
                     <router-link to="/profile/legal" tag="a">
                        <img src="/svg/icons/ic_contract.svg" class="svg" alt="Contract">
                        <span class="aside-nav__item__title has-text-weight-bold">Условия и договора</span>
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
