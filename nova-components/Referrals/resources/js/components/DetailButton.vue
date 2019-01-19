<template>
    <div @click="onClick">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm0-9a1 1 0 0 1 1 1v4a1 1 0 0 1-2 0v-4a1 1 0 0 1 1-1zm0-4a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/></svg>
    </div>
</template>

<script>
    import Vue from 'vue'
    export default {
        methods: {
            onClick(event) {
                console.log('click');
                var tr = $(this.$el).closest('tr');
                var row = $(this.$el).closest('#referrals-table').DataTable().row(tr);
                if (row.child.isShown()) {
                    row.child.hide();
                    tr.removeClass('shown');
                } else {
                    // Open this row
                    let DetailRow = Vue.extend(require('./DetailRow'));
                    let instance = new DetailRow();
                    instance.$mount();
                    row.child(instance.$el).show();
                    tr.addClass('shown');
                }
            }
        },
    }
</script>
