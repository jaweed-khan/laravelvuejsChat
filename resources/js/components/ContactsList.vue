<template>
    <div class="contacts-list">
        <ul>
            <li v-for="contact  in sortedContacts" :key="contact.id" @click="selectContact(contact)" :class="{ 'selected': contact == selected }">
                <div class="avatar">
                    <img :src="contact.profile_image" alt="contact.name" />
                </div>
                <div class="contact">
                    <p class="name">{{contact.name}}</p>
                    <p class="email">{{contact.email}}</p>
                </div>
                <span class="unread" v-if="contact.unread">{{ contact.unread }}</span>
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
            selected: this.contacts.length ? this.contacts[0] : null
        }
    },
    methods:{
        selectContact(contact){
            this.selected = contact; 
            this.$emit('selected', contact);
        }
    },
    computed:{
        sortedContacts(){
            return _.sortBy(this.contacts, [(contact) => {

                if(contact == this.selected) {
                    return Infinity;
                }

                return contact.unread;
            }]).reverse();
        }
    }
}
</script>
<style lang="scss" scoped>
.contacts-list {
    flex: 2;
    max-height:600px;
    overflow: scroll;
    border-left: 1px solid #a6a6aa;

    ul {
        list-style: none;
        padding: 0;

        li{
            display: flex;
            padding:2px;
            border-bottom: 1px solid #aaaaaa;
            height: 80px;
            position: relative;
            cursor: pointer; 

            &.selected{
                background-color: #dfdfdf;
            }

            span.unread{
                background: #82e0a8;
                color: #fff;
                position: absolute;
                right: 11px;
                top: 20px;
                display: flex;
                font-weight: 700;
                min-width: 20px;
                justify-content: center;
                align-items: center;
                line-height: 20px;
                font-size: 12px;
                padding: 0 4px;
                border-radius : 3px; 
            }

            .avatar{
                flex:1;
                display: flex;
                align-items: center;

                img{
                    width: 35px;
                    margin: 0 auto;
                    border-radius: 50%;
                }
            }
           
           .contact{
               flex:3;
               font-size: 10px;
               overflow: hidden;
               display: flex;
                flex-direction: column;
                justify-content: center;

                p {
                    margin: 0;

                    &.name{
                        font-size: 12px;
                        font-weight: bold;
                    }
                }
           }
        }
    }
}
</style>
