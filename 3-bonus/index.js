const Nightmare = require("nightmare");
const nightmare = Nightmare({
  show: true,
  openDevTools: {
    mode: "detach",
  },
  waitTimeout: 1000000000,
  executionTimeout: 1000000000,
  gotoTimeout: 1000000000,
});

const fs = require("fs");

const URL =
  "https://www.rossmann.pl/kategoria/Perfumy,8512?Page=###&PageSize=96";

const getUrl = (pageIndex) => URL.replace("###", pageIndex);
const maxPageIndex = 14;

let productList = [];

function addToList(list) {
  productList = productList.concat(list);
}

function comparePerfumes(a, b) {
  return a.price / a.ml - b.price / b.ml;
}

async function scrapePage(url) {
  try {
    const pageProducts = await nightmare
      .goto(url)
      .wait(() => {
        return document.querySelector('div[data-name="product-list"]');
      })
      .wait(2000)
      .evaluate(() => {
        let products = [];

        const x = document
          .querySelector('div[data-name="product-list"]')
          .querySelectorAll(".tile-product");
        // debugger;

        for (const product of x) {
          const name = product.querySelector(
            ".tile-product__name > strong"
          ).innerText;

          const mlArr = product
            .querySelector(".tile-product__name > span > span.text-nowrap")
            .innerText.split(" ");

          let ml = 0;

          for (let i = 0; i < mlArr.length; i++) {
            const e = mlArr[i];
            if (e === "ml") {
              ml = mlArr[i - 1];
              break;
            }
          }

          if (ml === 0) continue;

          const price = parseFloat(
            product
              .querySelector(".tile-product__price > span:last-child")
              .innerText.split(" ")[0]
              .replace(",", ".")
          );
          products.push({ name, ml, price });
        }

        return products;
      });

    addToList(pageProducts);
  } catch (error) {
    console.error("Failed on ", url, error);
  }
}

(async () => {
  for (let i = 1; i <= maxPageIndex; i++) {
    console.log(`Checking page ${i} of ${maxPageIndex}`);
    await scrapePage(getUrl(i));
  }

  console.log(productList);

  productList.sort(comparePerfumes);

  console.log(productList.slice(0, 10));

  let csv = "";
  for (const product of productList) {
    csv += `${product.name},${product.ml},${product.price}\n`;
  }

  fs.writeFile("./output.csv", csv, (err) => {
    if (err) {
      console.error(err);
    }
  });

  await nightmare.end();
})();
