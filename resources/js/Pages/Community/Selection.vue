<template>
        <p>Club Management</p>
        <CommunityList :communities="communities"/>

        <div v-for="community in departmens">
            <inertia-link :href="route('departmens.show',community.id)">All clubs</inertia-link>
        </div>
</template>

<script>
import CommunityLayout from '@/Layouts/CommunityLayout.vue';
import CommunityList from '@/Components/Community/CommunityList.vue';


export default {
    components: {
        CommunityLayout,
        CommunityList,
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