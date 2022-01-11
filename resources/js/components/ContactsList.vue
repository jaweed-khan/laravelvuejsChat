<template>
    <div class="contacts-list">
        <ul>
            <li v-for="(contact, index) in contacts" :key="contact.id" @click="selectContact(index, contact)" :class="{ 'selected': index == selected }">
                <div class="avatar">
                    <img :src="contact.profile_image" alt="contact.name" />
                </div>
                <div class="contact">
                    <p class="name">{{contact.name}}</p>
                    <p class="email">{{contact.email}}</p>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>

export default {
    props:{
        contacts: {
            type: Array,
            defaults:  []
        }
    },
    data(){
        return {
            selected: 0
        }
    },
    methods:{
        selectContact(index, contact){
            this.selected = index;
            this.$emit('selected', contact);
        }
    }
}
</script>
