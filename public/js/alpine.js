function showToastr(type, message) {
  bgColor = type == "success" ? "bg-green-600" : "bg-red-600";

  successSvg = `<svg class="w-8 h-8 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
</svg>`;

  errorSvg = `<svg class="w-8 h-8 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 9-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
</svg>`;

  svgType = type == "success" ? successSvg : errorSvg;

  $("#toastr").html(`<div class="w-min">${svgType}</div>
<div class="w-full">${message}</div>`);

  $("#toastr").removeClass("scale-x-0");

  $("#toastr").addClass(`scale-x-100 ${bgColor}`);

  setTimeout(function () {
    $("#toastr").removeClass("scale-x-100");
    $("#toastr").addClass("scale-x-0");
  }, 3000);
}
