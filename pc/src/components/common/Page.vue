<template>
    <div id="page_s" v-if="total">
        <span class="pageinfo">
            共
            <label id="total">{{}}</label>
            条
            {{currentPage}}/{{Math.ceil(total / pageSize)}} 页
        </span>
        <span class="pagefirst" @click="pageChange(1)">首页</span>
        <span class="pageup" @click="pageChange(currentPage - 1)" v-show="currentPage != 1">上一页</span>
        <a
            class="pagenum"
            href="javascript:void(0)"
            v-for="(item, key) in pageCount"
            :key="key"
            :class="{current: (item +1) == currentPage}"
            @click="pageChange(item + 1)"
        >&nbsp;{{key + 1}}&nbsp;</a>

        <a class="pagedown" href="javascript:void(0)" @click="pageChange(currentPage + 1)" v-show="currentPage != Math.ceil(total / pageSize)">下一页</a>
        <a
            class="pageend"
            href="javascript:void(0)"
            @click="pageChange(Math.ceil(total / pageSize))"
        >尾页</a>
    </div>
</template>
<script>
export default {
    props: {
        total: {
            type: Number,
            default: 0
        },
        pageSize: {
            type: Number,
            default: 10
        }
    },
    created() {
        console.log(Array.from(Array(10)));
    },
    data() {
        return {
            currentPage: 1
        };
    },
    computed: {
        pageCount () {
            const count = Object.keys(Array.from(Array(Math.ceil(this.total / this.pageSize))));
            // if (this.currentPage - 2 <= 0) {
            //     count.slice(0, 5);
            //     return count.slice(0, 5);;
            // }
            // if (this.currentPage + 2 >= count.length) {
            //     const num = count.length - 5 < 0 ? count.length - 5 : 0;
            //     console.log(count.slice(count.length - 5, count.length));
            //     return count.slice(count.length - 5, count.length);;
            // }
            return count;
        }
    },
    methods: {
        pageChange(currentPage) {
            this.currentPage = currentPage;
        }
    }
};
</script>
<style lang="less" scoped>
#page_s {
    width: 1000px;
    height: 40px;
    text-align: center;
    margin-bottom: 40px;
}
#page_s a:first-child {
    border: 0px;
}
#page_s span {
    padding: 5px 10px;
    border: 1px solid #ddd;
    color: #999;
}

#page_s a {
    padding: 5px 10px;
    border: 1px solid #ddd;
    color: #666;
}

#page_s .current {
    background: #0071c3;
    color: #fff;
}

#page_s .pageinfo {
    display: none;
}
</style>
