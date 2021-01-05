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
                    @click="
                        {
                            {
                                toggleDay(day.label, 'am');
                            }
                        }
                    "
                >
                    AM
                </div>
                <div
                    class="p-1.5 border-b border-white"
                    :class="isAvailable(day.pm)"
                    @click="
                        {
                            {
                                toggleDay(day.label, 'pm');
                            }
                        }
                    "
                >
                    PM
                </div>
            </div>
        </div>
        <div class="flex flex-row justify-end w-11/12 mx-auto py-2">
            <div v-if="isEditing">
                <button
                    @click="cancelEdit"
                    class="bg-red-600 hover:bg-red-500 text-white w-min px-3 px-2 rounded pointer"
                >
                    Cancel
                </button>
                <button
                    @click="saveDays"
                    class="bg-blue-600 hover:bg-blue-500 text-white w-min px-3 px-2 rounded pointer"
                >
                    Save
                </button>
            </div>
            <div v-else>
                <button
                    class="bg-gray-800 hover:bg-gray-700 text-white w-min px-3 px-2 rounded pointer"
                    @click="toggleEditing"
                >
                    {{ isEditing ? "Cancel" : "Edit" }}
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["availability", "token", "user"],
    data: function() {
        return {
            isEditing: false,
            isLoading: false,
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
        },
        toggleDay: function(day, time) {
            if (this.isEditing) {
                const index = this.days.findIndex(
                    element => element.label === day
                );

                this.days[index][time] = !this.days[index][time];
            }
        },
        saveDays: function() {
            this.isLoading = true;

            axios({
                method: "post",
                url: "availability",
                headers: {
                    "X-CSRF-TOKEN": this.token
                },
                data: {
                    user_id: this.user,
                    days: this.days
                }
            }).then(response => {
                this.isLoading = false;
                this.isEditing = false;
            });
        },
        cancelEdit: function() {
            this.isEditing = false;
            this.days = [
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
            ];
        }
    }
};
</script>

<style></style>
