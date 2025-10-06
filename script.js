document.addEventListener("DOMContentLoaded", function () {
    fetchMenu();
});

function fetchMenu() {
    const categoryList = document.getElementById("category-list");

    if (!categoryList) {
        console.error("Error: 'category-list' not found! Ensure <ul id='category-list'></ul> exists in your HTML.");
        return;
    }

    fetch("fetch_menu.php")
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                console.error("Error fetching menu:", data.error);
                return;
            }

            categoryList.innerHTML = ""; // Clear previous content

            data.forEach(category => {
                let categoryItem = document.createElement("li");
                categoryItem.classList.add("category-item");

                let categoryText = document.createElement("span"); // Use <span> instead of <a>
                categoryText.textContent = category.category_name;
                categoryItem.appendChild(categoryText);

                if (category.subcategories.length > 0) {
                    let subMenu = document.createElement("ul");
                    subMenu.classList.add("submenu");

                    category.subcategories.forEach(sub => {
                        let subItem = document.createElement("li");
                        subItem.textContent = sub.subcategory_name; // No <a> tag

                        // Make <li> clickable
                        subItem.style.cursor = "pointer";
                        subItem.addEventListener("click", function () {
                            window.location.href = `products.php?subcategory_id=${sub.subcategory_id}`;
                        });

                        subMenu.appendChild(subItem);
                    });

                    categoryItem.appendChild(subMenu);
                }

                categoryList.appendChild(categoryItem);
            });
        })
        .catch(error => console.error("Error fetching menu:", error));
}


document.addEventListener("DOMContentLoaded", function () {
    const accordionItems = document.querySelectorAll(".accordion-item");

    accordionItems.forEach(item => {
        const header = item.querySelector(".accordion-header");

        header.addEventListener("click", function () {
            const isActive = item.classList.contains("active");

            // Close all accordions
            accordionItems.forEach(i => {
                i.classList.remove("active");
                i.querySelector(".accordion-header span").textContent = "+";
            });

            // If it was not active, open it
            if (!isActive) {
                item.classList.add("active");
                header.querySelector("span").textContent = "−";
            }
        });
    });
});
