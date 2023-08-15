function saveData() {
  const txt_property_type_kh = document.getElementById("txt_property_type_kh");
  const txt_property_type_en = document.getElementById("txt_property_type_en");
  // Check if the fields are null or empty
  if (!txt_property_type_kh.value || !txt_property_type_en.value) {
    console.error("Fields are empty. Cannot process data.");
    return; // Return early to prevent further processing
  }

  const form = document.getElementById("create_property_type-form");
  const formData = new FormData(form);

  fetch("pages/property_type/create_property_type_serivce.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => {
      if (response.ok) {
        // Data was successfully saved
        console.log("Data saved successfully!");
        // Perform any additional actions if needed
      } else {
        // Handle the error if the save operation failed
        console.error("Failed to save data.");
      }
    })
    .catch((error) => {
      // Handle any network-related errors
      console.error("Network error:", error);
    });
}
