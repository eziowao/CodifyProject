const searchForm = document.querySelector("#search-form");
let displayElt = document.querySelector("#display");

let categorySelect = document.getElementById("categorySelect")
console.log(categorySelect);

let searchInputElt = searchForm.querySelector("input");

console.log(searchInputElt);

let search = "";

searchInputElt.addEventListener("input", ajaxCall);

categorySelect.addEventListener("change", ajaxCall)

async function ajaxCall() {
    search = this.value;

    //   if (search.length > 2) {
    const req = await fetch(`?page=home&=${search}`);
    const data = await req.json();

    // Traitement de manipulation DOM
    let output = "";
    // boucle
    data.forEach(function (vehicle) {
        output += ` 
            <div class="col-10 col-sm-6 col-lg-3 mb-4">
            <a href="?page=vehicles/vehicle&id=<?= $vehicle->vehicle_id ?>">
                <div class="card bg-list h-100">
                    <div class="card-top d-flex align-items-center">
                        <img class="card-img-top img-fluid" src="./../../../public/uploads/vehicles/<?= $vehicle->picture ?>" alt="Card image cap">
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= ${vehicle.brand} . ' - ' . ${vehicle.model} ?></h5>
                    </div>
                </div>
            </a>
        </div>
        `;
    });

    displayElt.innerHTML = output;
    //   }
}