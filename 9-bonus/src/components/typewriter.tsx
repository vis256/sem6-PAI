import React, { useState, useEffect } from "react";

const Typewriter = ({ text }: { text: string }) => {
  const [displayText, setDisplayText] = useState("");

  useEffect(() => {
    let i = 0;
    const intervalId = setInterval(() => {
      setDisplayText(text.substring(0, i));

      i++;

      if (i > text.length) {
        clearInterval(intervalId);
      }
    }, 80);
    return () => clearInterval(intervalId);
  }, [text]);

  return <div>{displayText}</div>;
};

export default Typewriter;
