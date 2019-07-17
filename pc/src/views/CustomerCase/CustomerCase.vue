<template>
    <div class="customer-case">
        <div class="banner_img">
            <img
                src="http://www.igeqin.com/App/Tpl/Home/Defaults/Public/images/images2/banner_08.jpg"
            />
        </div>
        <div class="company">
            <div class="empty" style="height:1350px;"></div>
            <Menu type="CASE" :list="list" @itemClick="itemClick"/>
            <CaseList :typeName="typeName"/>
        </div>
    </div>
</template>
<script>
import Menu from "@/components/common/Menu.vue";
import CaseList from "@/components/CustomerCase/CaseList.vue";
import { WOW } from "wowjs";
export default {
    mounted() {
        new WOW().init();
    },
    components: {
        Menu,
        CaseList
    },
    data() {
        return {
            list: [
                { id: 1, name: "汽车零1" },
                { id: 2, name: "汽车零2" },
                { id: 3, name: "汽车零3" },
                { id: 4, name: "汽车零4" },
                { id: 5, name: "汽车零5" }
            ],
            typeName: '汽车零1'
        };
    },
    methods: {
        itemClick (item) {
            this.typeName = item.name;
        }
    }
};
</script>
<style lang="less" scoped>
.company .empty {
    width: 200px;
    height: auto;
}
.company {
    width: 1200px;
    margin: 0px auto;
    display: flex;
    justify-content: space-between;
    position: relative;
}
.banner_img {
    width: 100%;
    overflow: hidden;
}
.banner_img img {
    display: block;
    margin: 0px auto;
}
</style>
