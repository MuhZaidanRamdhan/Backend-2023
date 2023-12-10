// producing promise
const showDownload = (result) => {
  return new Promise(() => {
    console.log("Download selesai");
    console.log("Hasil download : " + result);
  });
};

const download = () => {
  return new Promise((resolve) => {
    setTimeout(() => {
      const result = "windows-10.exe";
      resolve(showDownload(result));
    }, 3000);
  });
};
  
// consuming async await
const main = async () => {
  const hasil = await download();
  console.log(hasil);
};

// consuming promise
const second = async () => {
  download().then((result) => {
    console.log(result);
  });
};

main();
