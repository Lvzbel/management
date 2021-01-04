<template>
    <div class="flex flex-row w-full text-center divide-x divide-white">
        <div class="flex-1">
            <div class="font-bold bg-blue-200 p-1.5 border-b border-white">
                Monday
            </div>
            <div
                class="p-1.5 border-b border-white"
                :class="isAvailable(availability.monday_am)"
            >
                AM
            </div>
            <div
                class="p-1.5 border-b border-white"
                :class="isAvailable(availability.monday_pm)"
            >
                PM
            </div>
        </div>
        <div class="flex-1">
            <div class="font-bold bg-blue-200 p-1.5 border-b border-white">
                Tuesday
            </div>
            <div
                class="p-1.5 border-b border-white"
                :class="isAvailable(availability.tuesday_am)"
            >
                AM
            </div>
            <div
                class="p-1.5 border-b border-white"
                :class="isAvailable(availability.tuesday_pm)"
            >
                PM
            </div>
        </div>
        <div class="flex-1">
            <div class="font-bold bg-blue-200 p-1.5 border-b border-white">
                Wednesday
            </div>
            <div
                class="p-1.5 border-b border-white"
                :class="isAvailable(availability.wednesday_am)"
            >
                AM
            </div>
            <div
                class="p-1.5 border-b border-white"
                :class="isAvailable(availability.wednesday_pm)"
            >
                PM
            </div>
        </div>
        <div class="flex-1">
            <div class="font-bold bg-blue-200 p-1.5 border-b border-white">
                Thursday
            </div>
            <div
                class="p-1.5 border-b border-white"
                :class="isAvailable(availability.thursday_am)"
            >
                AM
            </div>
            <div
                class="p-1.5 border-b border-white"
                :class="isAvailable(availability.thursday_pm)"
            >
                PM
            </div>
        </div>
        <div class="flex-1">
            <div class="font-bold bg-blue-200 p-1.5 border-b border-white">
                Friday
            </div>
            <div
                class="p-1.5 border-b border-white"
                :class="isAvailable(availability.friday_am)"
            >
                AM
            </div>
            <div
                class="p-1.5 border-b border-white"
                :class="isAvailable(availability.friday_pm)"
            >
                PM
            </div>
        </div>
        <div class="flex-1">
            <div class="font-bold bg-blue-200 p-1.5 border-b border-white">
                Saturday
            </div>
            <div
                class="p-1.5 border-b border-white"
                :class="isAvailable(availability.saturday_am)"
            >
                AM
            </div>
            <div
                class="p-1.5 border-b border-white"
                :class="isAvailable(availability.saturday_pm)"
            >
                PM
            </div>
        </div>
        <div class="flex-1">
            <div class="font-bold bg-blue-200 p-1.5 border-b border-white">
                Sunday
            </div>
            <div
                class="p-1.5 border-b border-white"
                :class="isAvailable(availability.sunday_am)"
            >
                AM
            </div>
            <div
                class="p-1.5 border-b border-white"
                :class="isAvailable(availability.sunday_pm)"
            >
                PM
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["availability"],
    methods: {
        isAvailable: function(data) {
            if (data) {
                return "bg-green-200 hover:bg-green-300";
            } else {
                return "bg-red-200 hover:bg-red-300";
            }
        }
    }
};
</script>

<style></style>
