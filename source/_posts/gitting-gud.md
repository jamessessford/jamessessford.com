---
extends: _layouts.post
section: content
title: Gitting gud
date: 2019-12-26
edited: 2020-04-08
description: A couple of git optimisations in my work flow.
categories: [git, ubuntu]
excerpt: A couple of git optimisations in my work flow.
---

Git is now an essential part of my work flow. It's invaluable. I like knowing that
even though I may have to dig to find it, I have the history of an entire project
at my fingertips.

Since moving over to Ubuntu, I've made a few optimisations to my environment to help 
use Git.

##  Keys

I modified this from a Stack Overflow answer, it'll add the desired keys to SSH agent when you load a terminal/login through SSH and destroy the agent when the last thing using it is closed.

I have this at the bottom of my ~/.zshrc config file

```bash
# Start ssh-agent to keep you logged in with keys, use `ssh-add` to log in
agent=`pgrep ssh-agent -u $USER` # get only your agents           
if [[ "$agent" == "" || ! -e ~/.ssh/.agent_env ]]; then
    # if no agents or environment file is missing create a new one
    # remove old agents / environment variable files
    if [[ "$agent" != "" ]]; then
	kill $agent;
    fi
    rm -f ~/.ssh/.agent_env 

    # restart
    eval `ssh-agent`
    /usr/bin/ssh-add
    echo 'export SSH_AUTH_SOCK'=$SSH_AUTH_SOCK >> ~/.ssh/.agent_env             
    echo 'export SSH_AGENT_PID'=$SSH_AGENT_PID >> ~/.ssh/.agent_env             
fi

# create our own hardlink to the socket (with random name)           
source ~/.ssh/.agent_env                                                    
MYSOCK=/tmp/ssh_agent.${RANDOM}.sock                                        
ln -T $SSH_AUTH_SOCK $MYSOCK                                                
export SSH_AUTH_SOCK=$MYSOCK                                                

end_agent()                                                                     
{
    # if we are the last holder of a hardlink, then kill the agent
    nhard=`ls -l $SSH_AUTH_SOCK | awk '{print $2}'`                             
    if [[ "$nhard" -eq 2 ]]; then                                               
        rm ~/.ssh/.agent_env                                                    
        ssh-agent -k                                                            
    fi                                                                          
    rm $SSH_AUTH_SOCK                                                           
}                                                                               
trap end_agent EXIT 
set +x
```

##  Clone via SSH

After setting up injection of my SSH keys, I went around the projects I had 
on my machine and changed the remote from HTTPS to SSH. Now I can interact with remote
repositories without having to enter my username and password every time!

## WIP &amp; NAH

Earlier this year Dave Hemphill tweeted about the power of WIP. Essentially that's 
the only commit message you need. That gives us our first alias

```bash
alias wip="git add . && git commit -m 'WIP'"
```

I wouldn't advocate this behavoiur for team work or a situation where commit messages 
are necessary but for me to quickly save state and gaurantee that I'm storing project history, it more than works for me.

The second alias is nah. Nah is a git reset and clean to get your working tree back to the state of the last commit.

```bash
alias nah="git reset --hard && git clean -df"
```

## GitLens

GitLens gives VSCode super powers. I probably haven't scratched the surface of what
this package can do but I can now instantly get the full commit/edit history for
any project file from within the editor.

## Git Config (April 2020)

I don't know how I missed this last time - an easy optimisation is to add your user to the config globally :)

```bash
git config --global user.name "Jane Doe"
git config --global user.email "janedoe@converge.net"
```