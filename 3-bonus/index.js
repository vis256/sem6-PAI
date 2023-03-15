import puppeteer from "puppeteer";

const URL = "https://www.ikea.com/pl/pl/search/?q=szklanki";
const productQuery = ".plp-fragment-wrapper";

async function main() {
  const browser = await puppeteer.launch();

  const page = await browser.newPage();

  await page.goto(URL);

  await page.waitForNetworkIdle();

  await page.waitForSelector(productQuery);

  const products = await page.$$(productQuery);

  for (const product of products) {
    const e = await product.$(".pip-product-compact");

    const eh = await e.evaluateHandle((el) => el.outerHTML, e);
    console.log(eh);

    // const name = await (await el.getProperty("data-product-name")).jsonValue();
    // const price = await (await el.getProperty("data-price")).jsonValue();

    // console.log(name, price);
  }

  await browser.close();
}

main();
