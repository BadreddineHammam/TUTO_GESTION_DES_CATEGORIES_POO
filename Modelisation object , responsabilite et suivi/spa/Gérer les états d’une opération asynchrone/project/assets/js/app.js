const form = document.getElementById("categoryForm");
const btnSubmitForm = document.getElementById("btnSubmitForm");
const categoryName = document.getElementById("categoryName");
const message = document.getElementById("message");
const categoryList = document.getElementById("categoryList");

const API_URL = "controllers/CategorieController.php";



function showToast(message, type = 'success') 
{
    const toast = document.createElement('div');

    toast.classList.add('toast'); // useless css for now 

    if (type === 'success') 
    {
        toast.classList.add('toast-success');
    } 
    else 
    {
        toast.classList.add('toast-error');
    }

    toast.textContent = message;

    const container = document.getElementById('toast-container');
    container.appendChild(toast);

    setTimeout(function () 
    {
        toast.remove();
    }, 2000);
}












// Display all categories
async function loadCategories() 
{
    const response = await fetch(API_URL);

    if (!response.ok)
    {
        throw new Error("Could not load categories.");
    }

    const categories = await response.json();

    categoryList.replaceChildren(); //removes all existing elements inside categoryList
    
    categories.forEach(category => 
    {
        const li = document.createElement("li");
        li.textContent = category.name;
        categoryList.appendChild(li);
    });
}





// 1. Manage the loading state
function setLoadingState(isLoading) 
{
    btnSubmitForm.disabled = isLoading ;

    if (isLoading) 
    {
        btnSubmitForm.textContent = "Saving...";
    }
    else 
    {
        btnSubmitForm.textContent = "Save";
    }
}



// 2. Intercept the form submission
form.addEventListener("submit", async function (e) 
{
    e.preventDefault();

    const loadingStartedAt = Date.now();
    setLoadingState(true);
    message.textContent = "Sending request...";

    try
    {
        const response = await fetch(API_URL, {
            method: "POST",
            body: new FormData(form)
        });
        const data = await response.json();
         
        if (!response.ok) {
            throw new Error(data.message || "Request failed.");
        }
        showToast("Catégorie ajoutée avec succès", "success"); //__--_-___-___-___-_-_--__--_-_-_-__-_-_-_-_-______
        message.textContent = data.message; //Show the message
        categoryName.value = ""; //Clear the input
        await loadCategories(); //Refresh the category list
    }
    catch (error)
    {
        message.textContent = error.message;
        showToast("Erreur lors de l'enregistrement", "error");
    }
    finally
    {
        const timeRemaining = 2000 - (Date.now() - loadingStartedAt);

        if (timeRemaining > 0)
        {
            await new Promise(resolve => setTimeout(resolve, timeRemaining));
        }

        setLoadingState(false);
    }
});

// Display categories when the page opens
loadCategories().catch(error => {
    message.textContent = error.message;
});
