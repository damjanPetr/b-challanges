// 1.

const testNumber = 10;

if (testNumber % 2 === 0) {
  console.log("The number you write is even");
} else {
  console.log("The number you write is not even");
}

// 2.

for (let i = 10; i <= 100; i++) {
  if (i % 2 === 0 && i % 3 === 0) {
    console.log(i);
  }
}

// 3.

const testPrimeNumber1 = 10;
const testPrimeNumber2 = 5;
const testPrimeNumber3 = 12;

const largestNumber = Math.max(
  testPrimeNumber1,
  testPrimeNumber2,
  testPrimeNumber3
);
const smallestNumber = Math.min(
  testPrimeNumber1,
  testPrimeNumber2,
  testPrimeNumber3
);

console.log(`Largest number is ${largestNumber} `);
console.log(`Smallest number is ${smallestNumber}`);

function testPrime(num) {
  if (num <= 1) {
    console.log("1 is not prime number");
  }
  for (let i = 2; i < num; i++) {
    if (num % i === 0) {
      console.log(`${num} is not a prime number`);
      return;
    } else {
      console.log(`${num} is a prime number`);
      return;
    }
  }
}

testPrime(largestNumber);
testPrime(smallestNumber);
