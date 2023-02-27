const wasmFile = '/algorithm.wasm';

async function run() {
  const response = await fetch(wasmFile);
  const bytes = await response.arrayBuffer();
  const wasmModule = await WebAssembly.instantiate(bytes);
  const result = wasmModule.instance.exports.main();
  console.log(result);
}

run();
