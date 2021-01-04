<template>
    <div class="w-full py-5">
        <div
            class="flex flex-row w-11/12 mx-auto text-center divide-x divide-white shadow-sm"
        >
            <div v-for="day in days" :key="day.label" class="flex-1">
                <div class="font-bold bg-blue-200 p-1.5 border-b border-white">
                    {{ day.label }}
                </div>
                <div
                    class="p-1.5 border-b border-white"
                    :class="isAvailable(day.am)"
                >
                    AM
                </div>
                <div
                    class="p-1.5 border-b border-white"
                    :class="isAvailable(day.pm)"
                >
                    PM
                </div>
            </div>
        </div>
        <div class="flex flex-row justify-end w-11/12 mx-auto py-2">
            <button
                class="bg-gray-800 hover:bg-gray-700 text-white w-min px-3 px-2 rounded pointer"
                @click="toggleEditing"
            >
                {{ isEditing ? "Cancel" : "Edit" }}
            </button>
        </div>
    </div>
</template>

<script>
export default {
    props: ["availability"],
    data: function() {
        return {
            isEditing: false,
            days: [
                {
                    label: "Monday",
                    am: this.availability.monday_am,
                    pm: this.availability.monday_pm
                },
                {
                    label: "Tuesday",
                    am: this.availability.tuesday_am,
                    pm: this.availability.tuesday_pm
                },
                {
                    label: "Wednesday",
                    am: this.availability.wednesday_am,
                    pm: this.availability.wednesday_pm
                },
                {
                    label: "Thursday",
                    am: this.availability.thursday_am,
                    pm: this.availability.thursday_pm
                },
                {
                    label: "Friday",
                    am: this.availability.friday_am,
                    pm: this.availability.friday_pm
                },
                {
                    label: "Saturday",
                    am: this.availability.saturday_am,
                    pm: this.availability.saturday_pm
                },
                {
                    label: "Sunday",
                    am: this.availability.sunday_am,
                    pm: this.availability.sunday_pm
                }
            ]
        };
    },
    methods: {
        isAvailable: function(data) {
            if (data) {
                return "bg-green-200 hover:bg-green-300";
            } else {
                return "bg-red-200 hover:bg-red-300";
            }
        },
        toggleEditing: function() {
            this.isEditing = !this.isEditing;
        }
    }
};
</script>

<style></style>
