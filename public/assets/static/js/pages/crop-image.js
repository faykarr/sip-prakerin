FilePond.registerPlugin(FilePondPluginImagePreview, FilePondPluginImageCrop);

// Filepond: Image Crop
FilePond.create(document.querySelector(".image-crop-filepond"), {
  credits: null,
  allowImagePreview: true,
  allowImageFilter: false,
  allowImageExifOrientation: false,
  allowImageCrop: true,
  acceptedFileTypes: ["image/png", "image/jpg", "image/jpeg"],
  fileValidateTypeDetectType: (source, type) =>
    new Promise((resolve, reject) => {
      // Do custom type detection here and return with promise
      resolve(type);
    }),
  storeAsFile: true,
});
