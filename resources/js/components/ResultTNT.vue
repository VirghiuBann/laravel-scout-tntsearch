<template>
    <div>
        <h2>TNTSearch Result</h2>
        <div>
            <pre>
                {{ results }}
            </pre>
        </div>
    </div>
</template>

<script>
import eventBus from "../services/EventBus";
export default {
    data() {
        return {
            results: [],
        };
    },
    mounted() {
        eventBus.$on("product-event", (results = []) => {
            this.results = results;
        });
    },
    beforeDestroy() {
        eventBus.$off("product-event");
    },
};
</script>

<style lang="scss" scoped></style>
