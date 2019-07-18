<template>
    <div class="common_wapr">
        <dl class="public_nav">
            <dt>{{type}}</dt>
            <dd
                v-for="(item, key) in list"
                :key="key"
                :class="{cur: curId === item.id}"
                @click="itemClick(item)"
            >
                <a href="javascript:void(0)">{{item.name}}</a>
            </dd>
        </dl>
    </div>
</template>
<script>
export default {
    props: {
        type: {
            type: String
        },
        list: {
            type: Array,
            default() {
                return [];
            }
        }
    },
    data() {
        return {
            curId: 1
        };
    },
    methods: {
        itemClick (item) {
            this.curId = item.id;
            this.$emit('itemClick', item);
        }
    }
};
</script>
<style lang="less" scoped>
.common_wapr {
    width: 200px;
    height: auto;
    position: absolute;
    top: -40px;
    left: 0px;
    z-index: 66 !important;
}
.common_wapr .public_nav {
    width: 200px;
    height: auto;
    background: #0071c3;
}
.common_wapr .public_nav dt {
    height: 40px;
    font-size: 22px;
    color: #ffffff;
    text-align: center;
    line-height: 40px;
    font-weight: 700;
    border-bottom: 1px solid #ffffff;
    box-sizing: border-box;
}
.common_wapr .public_nav dd {
    text-align: center;
    height: 50px;
    color: #ffffff;
    font-size: 16px;
    line-height: 50px;
}
.common_wapr .public_nav dd a {
    display: block;
    width: 200px;
    height: 50px;
    color: #ffffff;
}
.common_wapr .public_nav dd a:hover {
    background: #015c9e;
}
.common_wapr .public_nav dd .cur {
    background: #015c9e;
}
.common_wapr .public_nav .cur {
    background: #015c9e;
}
</style>
