import {
    onValue,
    ref,
    limitToLast,
    query,
    orderByChild,
    equalTo,
    remove,
} from "firebase/database";
import { db } from "../map/getDb";
import dayjs from "dayjs";
import relativeTime from "dayjs/plugin/relativeTime";
import "dayjs/locale/id";

dayjs.extend(relativeTime);
dayjs.locale("id");

const notificationQuery = query(
    ref(db, "/notifications"),
    orderByChild("isRead"),
    equalTo(false),
    limitToLast(3)
);
const notificationNumber = document.getElementById("notification-number");
const notificationSection = document.getElementById("notification-items");
const markAsReadButton = document.getElementById(
    "markAsReadNotificationButton"
);

if (markAsReadButton) {
    markAsReadButton.addEventListener("click", () => {
        const modal = document.getElementById("notificationModal");
        if (modal.classList.contains("hidden")) {
            modal.classList.remove("hidden");
            document.body.classList.add("overflow-hidden");
        } else {
            modal.classList.add("hidden");
            document.body.classList.remove("overflow-hidden");
        }
        remove(ref(db, "/notifications"));
    });

    onValue(notificationQuery, (snapshot) => {
        const data = snapshot.val();
        if (!data) {
            notificationNumber.innerHTML = `0`;
            return;
        }
        const dataArray = Object.values(data);
        notificationNumber.innerHTML = dataArray.length;

        notificationSection.innerHTML = dataArray
            .map((data) => {
                return `<div
                                    class="p-3 border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 pt-0.5">
                                            <i class="fa-solid fa-info-circle text-blue-500"></i>
                                        </div>
                                        <div class="ml-3 w-0 flex-1">
                                            <p class="text-sm font-medium text-gray-900 dark:text-white">
                                                ${data.title}
                                            </p>
                                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                                ${data.type}
                                            </p>
                                            <p class="mt-1 text-xs text-gray-400">
                                                ${dayjs(
                                                    data.created_at
                                                ).fromNow()}
                                            </p>
                                        </div>
                                    </div>
                                </div>
            `;
            })
            .join("");
    });
}
