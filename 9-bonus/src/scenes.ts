export const Scenes: any = {
  "": {
    text: "You wake up in an abandoned cabin.",
    choices: [
      { text: "Bang on door", scene: "bang" },
      { text: "Ram the door", scene: "ram" },
      { text: "Try to open safe", scene: "safe" },
    ],
  },
  bang: {
    text: "You start banging on the door but noone answers.",
    choices: [{ text: "Try something else.", scene: "" }],
  },
  ram: {
    text: "You try to force open the door but it won't budge.",
    choices: [{ text: "Try something else.", scene: "" }],
  },
  safe: {
    text: "You try to guess the number combination required to open the safe. You try...",
    choices: [
      { text: "1337", scene: "fail" },
      { text: "6969", scene: "fail" },
      { text: "4200", scene: "pass" },
      { text: "4343", scene: "fail" },
      { text: "Try something else.", scene: "" },
    ],
  },
  fail: {
    text: "That was not the correct combination. You try...",
    choices: [
      { text: "1337", scene: "fail" },
      { text: "6969", scene: "fail" },
      { text: "4200", scene: "pass" },
      { text: "4343", scene: "fail" },
      { text: "Try something else.", scene: "" },
    ],
  },
  pass: {
    text: "Safe opened and inside it was a portal to your home.",
    choices: [],
  },
};
