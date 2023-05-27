<template>
    <CommunityLayout title="Dashboard" :community="communities[0]">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Management Dashboard community
            </h2>
        </template>
        <p>Community Management</p>
        {{ communities }}
    </CommunityLayout>
</template>

<script>
import CommunityLayout from '@/Layouts/CommunityLayout.vue';


export default {
    components: {
        CommunityLayout,
    },
    props: ['communities'],
    data() {
        return {

        }
    },
    methods: {

    },
}
</script>