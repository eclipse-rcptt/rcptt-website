from subprocess import Popen, PIPE, STDOUT
from sys import argv


def set_clipboard(input: str):
    with Popen(['pbcopy'], stdin=PIPE, text=True) as p:
        p.communicate(input=input)

def update(y1, x1, width, height) -> list:
    return [x1, y1, x1+width, y1+height]

def process_line(line: str):
    return " ".join(map(str, update(*map(int, line.split(", ")))))

if __name__ == "__main__":
    if argv[1:]:
        result = " ".join(map(str, update(*map(int, argv[1].split(", ")))))
        print(result)
        set_clipboard(result)
    else:
        while line := input("enter y1, x1, width, height > "):
            res = process_line(line)
            print(res)
            set_clipboard(res)
